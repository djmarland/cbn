<?php
class ShortKey {

    const ID_INFLATION_MULTIPLIER = 20;

    public static $_allowed = '23456789bcdfghjklmnpqrstvwxz';

    public static function toKey($model) {
        $base = strlen(self::$_allowed);
        $id = floor($model->id);
        $id = $id + static::ID_INFLATION_MULTIPLIER;

        $key = '';
        if ($id == 0) {
            $key = self::$_allowed[0];
        } else {
            while ($id > 0) {
                // modulus cannot support high int values. must use float instead
                $newid = floor($id / $base);
                $key = self::$_allowed[(int) ($id - ($newid*$base))] . $key;
                $id = $newid;
            }
        }
        return strtolower($model::KEY_PREFIX . ':0' . str_pad($key, 2, '0', STR_PAD_LEFT));
    }

    public static function toId($key, $prefix = false) {
        if (!$prefix) {
            $prefix = substr($key,0,1);
        }
        $key = strtolower($key);
        $key = str_replace(array('0',':'),'',$key);
        $base = strlen(self::$_allowed);
        $key = array_reverse(str_split(substr($key,strlen($prefix))));
        $id = 0;
        $power = 0;
        foreach ($key as $letter) {
            $id = $id + (strpos(self::$_allowed,$letter) * pow($base,$power));
            $power++;
        }

        $id = $id - static::ID_INFLATION_MULTIPLIER;
        return $id;
    }

    public static function isAKey($string) {
        return preg_match('/^[a-z]{1}0[0' . self::$_allowed . ']{2,}$/i', $string);
    }

}
