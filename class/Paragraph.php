<?php

/**
 * Created by PhpStorm.
 * User: dclae
 * Date: 06/10/2018
 * Time: 15:42
 */
require_once('trait/Initialization.php');

class Paragraph
{

    use Initialization;

    protected   $id,
                $idArticle,
                $text,
                $place,
                $errors = [];

    const INVALID_TEXT = 1;
    const INVALID_PLACE = 2;

    /**
     * Paragraph constructor.
     * @param array $values
     */
    public function __construct($values = [])
    {
        if (!empty($values))
        {
            $this->hydrate($values);
        }
    }

    //Setter
    public function setId($id)
    {

        $this->id = (int) $id;
    }

    public function setIdArticle($idArticle)
    {
        $this->idArticle = (int) $idArticle;
    }

    public function setText($text)
    {
        if(empty($text) || !is_string($text))
        {
            $this->errors[] = self::INVALID_TEXT;
        }
        else
        {
            $this->text = $text;
        }
    }

    public function setPlace($place)
    {
        if(empty($place))
        {
            $this->errors[] = self::INVALID_PLACE;
        }
        else
        {
            $this->place = (int) $place;
        }
    }

    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    //Getter
    public function getId()
    {
        return $this->id;
    }

    public function getIdArticle()
    {
        return $this->idArticle;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getPlace()
    {
        return $this->place;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}