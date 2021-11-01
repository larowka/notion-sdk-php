<?php

namespace Notion\Databases\Properties;

/**
 * @psalm-type DateJson = array{
 *      id: string,
 *      name: string,
 *      type: "date",
 *      date: array<empty, empty>,
 * }
 */
class Date implements PropertyInterface
{
    private const TYPE = Property::TYPE_DATE;

    private Property $property;

    private function __construct(Property $property)
    {
        $this->property = $property;
    }

    public static function create(string $propertyName = "Date"): self
    {
        $property = Property::create("", $propertyName, self::TYPE);

        return new self($property);
    }

    public function property(): Property
    {
        return $this->property;
    }

    public static function fromArray(array $array): self
    {
        /** @psalm-var DateJson $array */
        $property = Property::fromArray($array);

        return new self($property);
    }

    public function toArray(): array
    {
        $array = $this->property->toArray();
        $array[self::TYPE] = [];

        return $array;
    }
}