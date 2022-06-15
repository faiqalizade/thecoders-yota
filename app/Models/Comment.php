<?php

namespace App\Models;

class Comment extends Model
{
    public static string $tableName = 'comments';

    public static function getCommentTree()
    {
        $comments = json_decode(json_encode(self::findAll()), true);

        $new = [];
        foreach ($comments as $comment) {
            $new[$comment['parent_id']][] = $comment;
        }

        return self::createTree($new, $new[0]);
    }

    public static function createTree(&$list, $parent)
    {
        $tree = [];
        foreach ($parent as $k => $l) {
            if (isset($list[$l['id']])) {
                $l['children'] = self::createTree($list, $list[$l['id']]);
            }
            $tree[] = $l;
        }
        return $tree;
    }
}
