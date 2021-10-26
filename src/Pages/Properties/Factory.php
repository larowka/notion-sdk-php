<?php

namespace Notion\Pages\Properties;

use Exception;

class Factory
{
    /**
     * @param array{ type: string } $array
     */
    public static function fromArray(array $array): PropertyInterface
    {
        $type = $array["type"];

        return match($type) {
            Property::TYPE_TITLE => Title::fromArray($array),
            Property::TYPE_RICH_TEXT => RichTextProperty::fromArray($array),
            default => throw new Exception("Invalid property type: '{$type}'"),
        };
    }
}
