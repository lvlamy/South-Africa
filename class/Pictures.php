<?php

/**
 * Created by PhpStorm.
 * User: dclae
 * Date: 06/10/2018
 * Time: 16:02
 */

//require_once('trait/Initialization.php');

class Pictures
{
    //use Initialization;

    protected   $id,
                $idArticle,
                $filePath,
                $fileName,
                $tmpName,
                $size,
                $errorFile,
                $name,
                $source,
                $type = 0, //0 = default, 1 = miniature, 2 = carousel
                $place = 0,
                $errors = [];

    const DEFAULT_PICTURE = 0;
    const MINIATURE_PICTURE = 1;
    const CAROUSEL_PICTURE = 2;

    const UPLOAD_ERROR = 7;
    const INVALID_EXTENSION = 8;
    const INVALID_FILE_PATH = 9;
    const INVALID_SOURCE = 10;
    const INVALID_NAME = 11;
    const INVALID_PLACE = 12;


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
     * Check if the file respect the chart
     * @return bool
     */
    public function isValidFormat()
    {
        $allowedExtension = array('png','gif','jpg','jpeg');

        $extension = substr(strrchr($this->fileName,'.'),1);

        if(!in_array($extension,$allowedExtension))
        {
            $this->errors[] = self::INVALID_EXTENSION;
            return FALSE;
        }

        return true;


    }

    /**
     * Move the upload image in the folder
     * @return bool
     */
    public function move()
    {
        $extension = substr(strrchr($this->fileName,'.'),1);

        $newName = basename(time().$this->type.$this->place.'.'.$extension);

        $newNames = basename($newName);

        $this->fileName = $newNames;

        return move_uploaded_file($this->tmpName,"$this->filePath/$newNames");
    }

    /**
     * Check if all information is correct
     * @return bool
     */
    public function isValid()
    {
        if($this->isValidFormat() && !empty($this->filePath) && !empty($this->tmpName)) //Technique verification
        {
            if(!empty($this->source) && !empty($this->name)) //Picture information verification
            {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function validPlace()
    {
        if(!empty($this->place))
        {
            if($this->place>0)
                return true;
            else
                return false;
        }
        else
        {
            return false;
        }
    }

    /** SETTER */

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setIdArticle($idArticle)
    {
        $this->idArticle = (int) $idArticle;
    }

    public function setFilePath($filePath)
    {
        if(empty($filePath) || !is_string($filePath))
        {
            $this->errors[] = self::INVALID_FILE_PATH;
        }
        else
        {
            $this->filePath = $filePath;
        }
    }

    public function setName($name)
    {
        if(empty($name) || !is_string($name))
        {
            $this->errors[] = self::INVALID_NAME;
        }
        else
        {
            $this->name = $name;
        }
    }

    public function setSource($source)
    {
        if(empty($source) || !is_string($source))
        {
            $this->errors[] = self::INVALID_SOURCE;
        }
        else
        {
            $this->source = $source;
        }
    }

    /**
     * @param $type : 0 = Default, 1 = miniature, 2 = carousel
     */
    public function setType($type)
    {
        $this->type = (int) $type;
    }

    public function setPlace($place)
    {
        if(empty($place) || !is_int($place))
        {
            $this->errors[] = self::INVALID_PLACE;
        }
        else
        {
            $this->place = (int) $place;
        }
    }

    public function setSize($size)
    {
        $this->size = (int) $size;
    }

    public function setTmpName($tmpName)
    {
        if(empty($tmpName) || !is_string($tmpName))
        {
            $this->errors[] = self::UPLOAD_ERROR;
        }
        else
        {
            $this->tmpName = $tmpName;
        }
    }

    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    public function setFileName($fileName)
    {
        if(empty($fileName) || !is_string($fileName))
        {
            $this->errors[] = self::UPLOAD_ERROR;
        }
        else
        {
             $this->fileName = $fileName;
        }
    }

    public function setErrorFile($errorFile)
    {
        $this->errorFile = (int) $errorFile;
    }

    /** Getter  */

    public function getId()
    {
        return $this->id;
    }

    public function getIdArticle()
    {
        return $this->idArticle;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPlace()
    {
        return $this->place;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getTmpName()
    {
        return $this->tmpName;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function getErrorFile()
    {
        return $this->errorFile;
    }
}