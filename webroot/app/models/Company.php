<?php

class Company extends Base {

    const KEY_PREFIX = 'c';

    const TABLE = 'companies';

    // @todo - get rid of eloquent
    protected $fillable = array('*');

    public static $_properties = array(
        'id',
        'name',
        'url_word',
        'created_by',
        'created_at',
        'updated_at',
        'parent_company'
    );

    public static function Register($companydata)
    {
        // create in database
        $company = new self;
        $company->name = $companydata['name'];
        if (isset($companydata['url_word']) && !empty($companydata['url_word'])) {
            $company->url_word = $companydata['url_word'];
        }
        $company->created_by = $companydata['creator']->id;
        $company->save();
        return $company;
    }

    public static function findByUrlWord($word)
    {
        $company = self::where('url_word','=', $word)->first();
        return $company;
    }

    public static function findByCreator($user)
    {
        $companies = self::where('created_by','=', $user->id)->get();
        return $companies;
    }

    public static function findByParentCompany($company)
    {
        $companies = self::where('parent_company','=', $company->id)->get();
        return $companies;
    }

    public static function countByParentCompany($company)
    {
        return self::where('parent_company','=', $company->id)->count();
    }



    public static function findByChildCompany($company)
    {
        if ($company->parent_company) {
            return self::findById($company->parent_company);
        }
        return null;
    }

    public function url_entity()
    {
        if (isset($this->url_word) && !empty($this->url_word)) {
            return $this->url_word;
        }
        return $this->url_key();
    }

}
