<?php

/**
 * Created by PhpStorm.
 * User: dclae
 * Date: 06/10/2018
 * Time: 12:56
 */

class Articles
{

    protected   $id,
                $title,
                $subtitle,
                $author,
                $text = [],
                $miniaturePicture,
                $carouselPicture,
                $pictures = [],
                $date,
                $place = [],
                $errors = [];


    const INVALID_TITLE = 1;
    const INVALID_AUTHOR = 2;
    const INVALID_PARAGRAPH = 3;
    const INVALID_SUBTITLE = 4;
    const INVALID_MINIATURE_PICTURE = 5;
    const INVALID_CAROUSEL_PICTURE = 6;
    const MISS_FIELD = 7;
    const INVALID_PICTURE_UPLOAD = 8;

    const TEXT_FIELD = 1;
    const PICTURE_FIELD = 2;

    /**
     * ArticlesManager constructor.
     * @param array $values
     */
    public function __construct($values = [])
    {
        if (!empty($values))
        {
            $this->hydrate($values);
        }
    }

    public function hydrate($data)
    {
        foreach ($data as $attribute => $values)
        {
            $method = 'set'.ucfirst($attribute);

            if (is_callable([$this, $method]))
            {
                $this->$method($values);
            }
        }
    }

    /**
     * Check if all information is correct
     * @return bool
     */
    public function isValid(){
        if(!(empty($this->title) || empty($this->author) || empty($this->text) || empty($this->subtitle)))
        {
            if(!(empty($this->miniaturePicture) || empty($this->carouselPicture)))
            {
                if(!($this->miniaturePicture->isValid()) || !($this->carouselPicture->isValid()))
                {
                    return false;
                }
            }
            else
            {
                return false;
            }

            foreach($this->pictures as $picture)
            {

                if(!($picture->isValid()) || !($picture->validPlace()))
                {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    public function isValidUpdate()
    {
        $valid = true;

        if(empty($this->title) || empty($this->author) || empty($this->text) || empty($this->subtitle) || empty($this->id))
        {
            $valid = false;
        }

        if(!empty($this->miniaturePicture) && !empty($this->carouselPicture))
        {
            if(!($this->miniaturePicture->isValidUpdate()) || !($this->carouselPicture->isValidUpdate()))
            {
                $valid = false;
            }
        }
        else
        {
            $valid = false;
        }

        foreach ($this->pictures as $picture)
        {
            if($picture->getId() == "0" && empty($picture->getFileName()))
                $valid = false;
        }

        return $valid;
    }


    public function sizeTableValid()
    {
        if(count($this->place) == (count($this->text) + count($this->pictures)))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function addPlace()
    {
        if($this->sizeTableValid())
        {
            $textCursor = 0;
            $pictureCursor = 0;

            foreach($this->place as $key => $value)
            {

                if($value == self::TEXT_FIELD)
                {
                    $this->text[$textCursor]->setPlace($key+1);
                    $textCursor++;
                }
                if($value == self::PICTURE_FIELD)
                {
                    $this->pictures[$pictureCursor]->setPlace($key+1);
                    $pictureCursor++;
                }
            }
        }
        else
        {
            $this->errors[] = self::MISS_FIELD;
        }
    }

    /**
     * Check if the article is news
     * @return bool
     */
    public function newArticle(){
        return empty($this->id);
    }

    /** SETTER */

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setTitle($title)
    {
        if(empty($title) || !is_string($title))
        {
            $this->errors[] = self::INVALID_TITLE;
        }
        else
        {
            $this->title = $title;
        }
    }

    public function setAuthor($author)
    {
        if(empty($author) || !is_string($author))
        {
            $this->errors[] = self::INVALID_AUTHOR;
        }
        else
        {
            $this->author = $author;
        }
    }

    public function setText($text)
    {
        $valid = false;
        foreach($text as $value)
        {
            if(!empty($value->getText()))
            {
                $this->text[] = $value;
                $valid = true;
            }
        }
        if(!$valid)
        {
            $this->errors[] = self::INVALID_PARAGRAPH;
        }
    }

    public function setPictures($pictures)
    {
        foreach($pictures as $picture)
        {
            if(empty($picture->getFileName()))
            {
                $this->errors[] = self::INVALID_PICTURE_UPLOAD;

            }
            $this->pictures[] = $picture;
        }
    }

    public function setMiniaturePicture(Pictures $miniaturePicture)
    {
        if(empty($miniaturePicture->getFileName()))
        {
            $this->errors[] = self::INVALID_MINIATURE_PICTURE;
        }
        else
        {
            $this->miniaturePicture = $miniaturePicture;
        }
    }

    public function setCarouselPicture($carouselPicture)
    {
        if(empty($carouselPicture->getFileName()))
        {
            $this->errors[] = self::INVALID_CAROUSEL_PICTURE;
        }
        else
        {
            $this->carouselPicture = $carouselPicture;
        }
    }

    public function setSubtitle($subtitle)
    {
        if(empty($subtitle) || !is_string($subtitle))
        {
            $this->errors[] = self::INVALID_SUBTITLE;
        }
        else
        {
            $this->subtitle = $subtitle;
        }
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setPlace($place)
    {
        $this->place = $place;
    }

    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /** GETTER */

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getPictures()
    {
        return $this->pictures;
    }

    public function getMiniaturePicture()
    {
        return $this->miniaturePicture;
    }

    public function getCarouselPicture()
    {
        return $this->carouselPicture;
    }

    public function getPlace()
    {
        return $this->place;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getErrors()
    {
        if(!empty($this->miniaturePicture))
        {
            $this->errors = array_merge($this->errors,$this->miniaturePicture->getErrors());
        }
        if(!empty($this->carouselPicture))
        {
            $this->errors = array_merge($this->errors,$this->carouselPicture->getErrors());
        }
        foreach($this->pictures as $picture)
        {
            if(!empty($picture->getErrors())){
                $this->errors = array_merge($this->errors, $picture->getErrors());
            }
        }
        foreach($this->text as $value)
        {
            if(!empty($value->getErrors())){
                $this->errors = array_merge($this->errors, $value->getErrors());
            }
        }
        return $this->errors;
    }

}