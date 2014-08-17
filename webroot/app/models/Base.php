<?php

class Base extends Eloquent {
/*
    public function __construct($data)
    {
        foreach ($data as $prop => $value) {
            $this->$prop = $value;
        }
    }
*/
    public function url_key()
    {
        return ShortKey::toKey($this);
    }

    public static function findById($id)
    {
        $class = get_called_class();
        $obj = static::find($id);
        return $obj;
    }

    public static function findByKey($key)
    {
        $id = ShortKey::toId($key);
        return static::findById($id);
    }


    public function sameAs($obj)
    {
        return ($this->id == $obj->id);
    }

    public static function getJoinQuery()
    {
        $properties = array();
        foreach (static::$_properties as $property) {
            $properties[] = static::TABLE . '.' . $property . ' as "' . static::TABLE . '.' . $property . '"';
        }
        return implode(', ',$properties);
    }
/*
    protected static function table()
    {
        return DB::table(static::$table);
    }

    public static function all()
    {
        $items = array();
        $results = static::table()->get();
        $class = get_called_class();
        foreach ($results as $result) {
            $items[] = new $class($result);
        }
        return $items;
    }
*/

}
