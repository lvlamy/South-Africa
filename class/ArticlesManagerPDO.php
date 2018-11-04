<?php
/**
 * Created by PhpStorm.
 * User: dclae
 * Date: 06/10/2018
 * Time: 11:36
 */

class ArticlesManagerPDO
{

    protected $db;
    protected $lastInsertId;


    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param Articles $articles
     */
    public function save(Articles $articles){
        if($articles->isValid())
        {
            $this->add($articles);
        }
        else
        {
            throw new RuntimeException('La news doit être valide pour être enregistrée');
        }
    }

    public function selectArticle($id)
    {
        $reqArticle = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $reqArticle->bindValue('id', $id);
        $reqArticle->execute();
        $dataArticle = $reqArticle->fetch();

        $reqParagraph = $this->db->prepare('SELECT * FROM paragraph WHERE idArticle = :id');
        $reqParagraph->bindValue('id', $id);
        $reqParagraph->execute();

        $paragraph = [];
        while ($dataParagraph = $reqParagraph->fetch())
        {
            $paragraph[] = new Paragraph(array(
                'id' => $dataParagraph['id'],
                'idArticle' => $dataParagraph['idArticle'],
                'text' => $dataParagraph['text'],
                'place' => $dataParagraph['place']
            ));
        }

        $reqPictures = $this->db->prepare('SELECT * FROM pictures WHERE idArticle = :id AND type = :type');
        $reqPictures->bindValue('id', $id);
        $reqPictures->bindValue('type', Pictures::DEFAULT_PICTURE);
        $reqPictures->execute();

        $pictures = [];
        while ($dataPictures = $reqPictures->fetch())
        {
            $pictures[] = new Pictures(array(
                'id' => $dataPictures['id'],
                'idArticle' => $dataPictures['idArticle'],
                'filePath' => $dataPictures['filePath'],
                'fileName' => $dataPictures['fileName'],
                'size' => $dataPictures['size'],
                'name' => $dataPictures['name'],
                'source' => $dataPictures['source'],
                'type' => $dataPictures['type'],
                'place' => $dataPictures['place'],
            ));
        }

        $reqThumbnail = $this->db->prepare('SELECT * FROM pictures WHERE idArticle = :id AND type = :type');
        $reqThumbnail->bindValue('id', $id);
        $reqThumbnail->bindValue('type', Pictures::MINIATURE_PICTURE);
        $reqThumbnail->execute();

        $dataThumbnail = $reqThumbnail->fetch();

        $thumbnail = new Pictures(array(
            'id' => $dataThumbnail['id'],
            'idArticle' => $dataThumbnail['idArticle'],
            'filePath' => $dataThumbnail['filePath'],
            'fileName' => $dataThumbnail['fileName'],
            'size' => $dataThumbnail['size'],
            'name' => $dataThumbnail['name'],
            'source' => $dataThumbnail['source'],
            'type' => $dataThumbnail['type'],
            'place' => $dataThumbnail['place'],
        ));

        $reqCarousel = $this->db->prepare('SELECT * FROM pictures WHERE idArticle = :id AND type = :type');
        $reqCarousel->bindValue('id', $id);
        $reqCarousel->bindValue('type', Pictures::CAROUSEL_PICTURE);
        $reqCarousel->execute();

        $dataCarousel = $reqCarousel->fetch();

        $carousel = new Pictures(array(
            'id' => $dataCarousel['id'],
            'idArticle' => $dataCarousel['idArticle'],
            'filePath' => $dataCarousel['filePath'],
            'fileName' => $dataCarousel['fileName'],
            'size' => $dataCarousel['size'],
            'name' => $dataCarousel['name'],
            'source' => $dataCarousel['source'],
            'type' => $dataCarousel['type'],
            'place' => $dataCarousel['place'],
        ));


        $article = new Articles(array(
            'id' => $dataArticle['id'],
            'title' => $dataArticle['title'],
            'subtitle' => $dataArticle['subtitle'],
            'author' => $dataArticle['author'],
            'date' => $dataArticle['dateAdd'],
            'miniaturePicture' => $thumbnail,
            'carouselPicture' => $carousel,
            'text' => $paragraph,
            'pictures' => $pictures
        ));

        return $article;
    }

    protected function addPicture(Pictures $picture)
    {
        $reqPicture = $this->db->prepare('
              INSERT INTO pictures(idArticle, filePath, fileName, size, name, source, place, type)
              VALUE (:idArticle, :filePath, :fileName, :size, :name, :source, :place, :type)');
        $reqPicture->bindValue(':idArticle', $this->lastInsertId);
        $reqPicture->bindValue(':filePath', $picture->getFilePath());
        $reqPicture->bindValue(':fileName', $picture->getFileName());
        $reqPicture->bindValue(':size', $picture->getSize());
        $reqPicture->bindValue(':name', $picture->getName());
        $reqPicture->bindValue(':source', $picture->getSource());
        $reqPicture->bindValue(':place', $picture->getPlace());
        $reqPicture->bindValue(':type', $picture->getType());
        $reqPicture->execute();
    }

    /**
     * Insert a new article in the db
     * @param Articles $articles
     */
    protected function add(Articles $articles)
    {
        $reqArticles = $this->db->prepare('INSERT INTO articles(title, author, subtitle, dateAdd, dateUpdate ) VALUES(:title, :author, :subtitle, NOW(), NOW())');
        $reqArticles->bindValue(':title', $articles->getTitle());
        $reqArticles->bindValue(':author',$articles->getAuthor());
        $reqArticles->bindValue(':subtitle',$articles->getSubtitle());
        $reqArticles->execute();
        $this->lastInsertId = $this->db->lastInsertId();

        foreach($articles->getText() as $text)
        {
            $reqParagraph = $this->db->prepare('INSERT INTO paragraph(idArticle, text, place) VALUE (:idArticle, :text, :place)');
            $reqParagraph->bindValue(':idArticle', $this->lastInsertId);
            $reqParagraph->bindValue(':text', $text->getText());
            $reqParagraph->bindValue(':place', $text->getPlace());
            $reqParagraph->execute();
        }

        foreach($articles->getPictures() as $picture)
        {
            $this->addPicture($picture);
        }

        $this->addPicture($articles->getMiniaturePicture());
        $this->addPicture($articles->getCarouselPicture());

    }

    /** SETTER */

    /**
     * @param $lastInsertId : int
     */
    public function setLastInsertId($lastInsertId)
    {
        $this->lastInsertId = (int) $lastInsertId;
    }

    /** GETTER */
    public function getLastInsertId()
    {
        return $this->lastInsertId;
    }
}

