<?php

namespace App\Repositories\Skill;


use App\Models\Skill;

interface   SkillRepository {
    public function getAllSkill();
    public function store($params);
    public function updateById($id, $params);
    public function destroyById($id);
    public function findById($id): Skill;
}