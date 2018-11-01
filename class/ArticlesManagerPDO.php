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
            $reqParagraph = $this->db->prepare('INSERT INTO paragraph(idArticle, text) VALUE (:idArticle, :text)');
            $reqParagraph->bindValue(':idArticle', $this->lastInsertId);
            $reqParagraph->bindValue(':text', $text->getText());
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

