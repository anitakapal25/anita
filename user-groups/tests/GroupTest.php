<?php

class GroupTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testShouldReturnAllGroups()
    {

        $this->get("api/groups", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'group_name',
                    'group_created_by',
                    'created_at',
                    'updated_at',
                    'links',
                ],
            ],
            'meta' => [
                '*' => [
                    'total',
                    'count',
                    'per_page',
                    'current_page',
                    'total_pages',
                    'links',
                ],
            ],
        ]);

    }

    public function testShouldCreateGroup()
    {
        $parameters = [
            'group_name' => 'XYZ',
            'group_created_by' => 1,
        ];

        $this->post("api/groups", $parameters, []);
        $this->seeStatusCode(201);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'group_name',
                    'group_created_by',
                    'created_at',
                    'updated_at',
                    'links',
                ],
            ]
        );

    }
}
