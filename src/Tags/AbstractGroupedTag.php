<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Containers\ContainerGroup;
use ByJoby\HTML\Traits\GroupedContainerTrait;

abstract class AbstractGroupedTag extends AbstractTag implements ContainerTagInterface
{
    use GroupedContainerTrait;

    public function __toString(): string
    {
        $openingTag = sprintf('<%s>', implode(' ', $this->openingTagStrings()));
        $closingTag = sprintf('</%s>', $this->tag());
        $groups = array_filter(
            array_map(
                function (ContainerGroup $group) {
                    return trim($group);
                },
                $this->groups()
            ),
            function (string $group) {
                return !!$group;
            }
        );
        if (!$groups) {
            return $openingTag . $closingTag;
        } else {
            return implode(
                PHP_EOL,
                [
                    $openingTag,
                    implode(PHP_EOL, $groups),
                    $closingTag
                ]
            );
        }
    }
}
