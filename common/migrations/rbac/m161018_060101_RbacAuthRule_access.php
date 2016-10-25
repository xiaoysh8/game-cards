<?php

use yii\db\Migration;

class m161018_060101_RbacAuthRule_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "backend_rbac-auth-rule_index",
            "description" => "backend/rbac-auth-rule/index"
        ],
        "view" => [
            "name" => "backend_rbac-auth-rule_view",
            "description" => "backend/rbac-auth-rule/view"
        ],
        "create" => [
            "name" => "backend_rbac-auth-rule_create",
            "description" => "backend/rbac-auth-rule/create"
        ],
        "update" => [
            "name" => "backend_rbac-auth-rule_update",
            "description" => "backend/rbac-auth-rule/update"
        ],
        "delete" => [
            "name" => "backend_rbac-auth-rule_delete",
            "description" => "backend/rbac-auth-rule/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "BackendRbacAuthRuleFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "BackendRbacAuthRuleView" => [
            "index",
            "view"
        ],
        "BackendRbacAuthRuleEdit" => [
            "update",
            "create",
            "delete"
        ]
    ];
    
    public function up()
    {
        
        $permisions = [];
        $auth = \Yii::$app->authManager;

        /**
         * create permisions for each controller action
         */
        foreach ($this->permisions as $action => $permission) {
            $permisions[$action] = $auth->createPermission($permission['name']);
            $permisions[$action]->description = $permission['description'];
            $auth->add($permisions[$action]);
        }

        /**
         *  create roles
         */
        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->add($role);

            /**
             *  to role assign permissions
             */
            foreach ($actions as $action) {
                $auth->addChild($role, $permisions[$action]);
            }
        }
    }

    public function down() {
        $auth = Yii::$app->authManager;

        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->remove($role);
        }

        foreach ($this->permisions as $permission) {
            $authItem = $auth->createPermission($permission['name']);
            $auth->remove($authItem);
        }
    }
}
