<?php

use yii\db\Migration;

class m161018_020101_RbacAuthAssignment_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "backend_rbac-auth-assignment_index",
            "description" => "backend/rbac-auth-assignment/index"
        ],
        "view" => [
            "name" => "backend_rbac-auth-assignment_view",
            "description" => "backend/rbac-auth-assignment/view"
        ],
        "create" => [
            "name" => "backend_rbac-auth-assignment_create",
            "description" => "backend/rbac-auth-assignment/create"
        ],
        "update" => [
            "name" => "backend_rbac-auth-assignment_update",
            "description" => "backend/rbac-auth-assignment/update"
        ],
        "delete" => [
            "name" => "backend_rbac-auth-assignment_delete",
            "description" => "backend/rbac-auth-assignment/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "BackendRbacAuthAssignmentFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "BackendRbacAuthAssignmentView" => [
            "index",
            "view"
        ],
        "BackendRbacAuthAssignmentEdit" => [
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
