<?php
/**
 * Created by PhpStorm.
 * User: dclae
 * Date: 06/10/2018
 * Time: 15:52
 */

trait Initialization{

    /**
     * @param $data array
     * @return void
     */
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
}

