<?php

class UserInCompany extends Base {

    const KEY_PREFIX = 'i';
    const TABLE = 'user_in_company';
    protected $table = 'user_in_company';

    const STATUS_AWAITING_APPROVAL  = -10;
    const STATUS_INACTIVE           = 0;
    const STATUS_PAST               = 10;
    const STATUS_ACTIVE             = 20;
    const STATUS_ADMIN              = 100;

    protected $user;
    protected $company;

    private $status_texts = array(
        self::STATUS_AWAITING_APPROVAL => 'Awaiting approval',
        self::STATUS_INACTIVE => 'Inactive',
        self::STATUS_PAST => 'Previous company',
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_ADMIN => 'Admin',
    );

    public function getStatusText()
    {
        return $this->status_texts[$this->status];
    }

    // @todo - get rid of eloquent
    protected $fillable = array('*');

    public static function setup($data)
    {
        $company = array();
        $user = array();
        $properties = array();
        foreach ($data as $property => $value) {
            $property_bits = explode('.',$property);
            if (count($property_bits) > 1) {
                if ($property_bits[0] == User::TABLE) {
                    $user[$property_bits[1]] = $value;
                } elseif ($property_bits[0] == Company::TABLE) {
                    $company[$property_bits[1]] = $value;
                }
            } else {
                $properties[$property] = $value;
            }
        }
        $relationship = new self;
        foreach ($properties as $k => $v) {
            $relationship->$k = $v;
        }

        // boooo
        // @todo - ditch eloquent as this is messy
        if (!empty($company)) {
            $c = new Company($company);
            foreach ($company as $p => $v) {
                $c->$p = $v;
            }
            $relationship->addCompany($c);
        }

        if (!empty($user)) {
            $u = new User($user);
            foreach ($user as $p => $v) {
                $u->$p = $v;
            }
            $relationship->addUser($u);
        }

        return $relationship;
    }

    public function addUser(User $user) {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
    public function getCompany()
    {
        return $this->company;
    }

    public function addCompany(Company $company) {
        $this->company = $company;
    }

    public static function createNewRelationship(
        User $user,
        Company $company,
        $status = self::STATUS_AWAITING_APPROVAL
    )
    {
        // create in database
        $relationship = new self;
        $relationship->user_id = $user->id;
        $relationship->company_id = $company->id;
        $relationship->status = $status;
        $relationship->save();
        return $relationship;
    }


    public static function findActiveUsersByCompany(
        Company $company
    )
    {
        $results = DB::table(self::TABLE)
            ->leftJoin(User::TABLE, User::TABLE . '.id', '=', self::TABLE . '.user_id')
            ->where(self::TABLE . '.company_id', '=', $company->id)
            ->where(self::TABLE . '.status', '>', self::STATUS_INACTIVE)
            ->selectRaw(User::getJoinQuery() . ', ' . self::TABLE . '.*')
            ->get();

        $relationships = array();
        foreach ($results as $result) {
            $relationships[] = self::setup($result);
        }
        return $relationships;
    }

    public static function findActiveCompaniesByUser(
        User $user,
        $include_hidden = false
    )
    {
        $results = DB::table(self::TABLE)
            ->leftJoin(Company::TABLE, Company::TABLE . '.id', '=', self::TABLE . '.company_id')
            ->where(self::TABLE . '.user_id', '=', $user->id)
            ->where(self::TABLE . '.status', '>', self::STATUS_INACTIVE);

        if (!$include_hidden) {
            $results = $results->where(self::TABLE . '.show_on_user_profile', '=', 1);
        }

        $results = $results->selectRaw(Company::getJoinQuery() . ', ' . self::TABLE . '.*')
            ->get();

        $relationships = array();
        foreach ($results as $result) {
            $relationships[] = self::setup($result);
        }
        return $relationships;
    }

    public static function findAllByUser(
        User $user
    )
    {
        $results = DB::table(self::TABLE)
            ->leftJoin(Company::TABLE, Company::TABLE . '.id', '=', self::TABLE . '.company_id')
            ->where(self::TABLE . '.user_id', '=', $user->id);

        $results = $results->selectRaw(Company::getJoinQuery() . ', ' . self::TABLE . '.*')
            ->get();

        $relationships = array();
        foreach ($results as $result) {
            $relationships[] = self::setup($result);
        }
        return $relationships;
    }

}