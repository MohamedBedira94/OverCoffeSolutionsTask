<?php
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		$permission = [
			[
				'name' => 'role-list',
				'display_name' => 'Display Role Listing',
				'description' => 'See only Listing Of Role'
			],
			[
				'name' => 'role-create',
				'display_name' => 'Create Role',
				'description' => 'Create New Role'
			],
			[
				'name' => 'role-edit',
				'display_name' => 'Edit Role',
				'description' => 'Edit Role'
			],
			[
				'name' => 'role-delete',
				'display_name' => 'Delete Role',
				'description' => 'Delete Role'
			],
			[
				'name' => 'user-list',
				'display_name' => 'Display Users Listing',
				'description' => 'See only Listing Of users'
			],
			[
				'name' => 'user-create',
				'display_name' => 'Create User',
				'description' => 'Create New User'
			],
			[
				'name' => 'user-edit',
				'display_name' => 'Edit User',
				'description' => 'Edit User'
			],
			[
				'name' => 'user-delete',
				'display_name' => 'Delete User',
				'description' => 'Delete User'
			],
			[
				'name' => 'category-list',
				'display_name' => 'Display Categories Listing',
				'description' => 'See only Listing Of Categories'
			],
			[
				'name' => 'category-create',
				'display_name' => 'Create Categories',
				'description' => 'Create New Categories'
			],
			[
				'name' => 'category-edit',
				'display_name' => 'Edit Categories',
				'description' => 'Edit Categories'
			],
			[
				'name' => 'category-delete',
				'display_name' => 'Delete Categories',
				'description' => 'Delete Categories'
			],
			[
				'name' => 'post-list',
				'display_name' => 'Display Posts Listing',
				'description' => 'See only Listing Of Posts'
			],
			[
				'name' => 'post-create',
				'display_name' => 'Create Post',
				'description' => 'Create New Post'
			],
			[
				'name' => 'post-edit',
				'display_name' => 'Edit Post',
				'description' => 'Edit Post'
			],
			[
				'name' => 'post-delete',
				'display_name' => 'Delete Post',
				'description' => 'Delete Post'
			]
		];


		foreach ($permission as $key => $value) {
			\App\Permission::create($value);
		}
	}
}
