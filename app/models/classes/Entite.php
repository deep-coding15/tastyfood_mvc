<?php
namespace App\Models\Classes;
use DateTime;
use ReflectionClass;

abstract class Entite
{
    public static function hydrate(array $data, string $className): object
    {
        $reflection = new ReflectionClass($className);
        $params = [];

        foreach ($reflection->getConstructor()->getParameters() as $param) {
            $name = $param->getName();

            if (isset($data[$name])) {
                $type = $param->getType()?->getName();

                // Conversion automatique DateTime
                if ($type === DateTime::class) {
                    $params[] = new DateTime($data[$name]);
                } else {
                    settype($data[$name], $type);
                    $params[] = $data[$name];
                }
            }
        }

        return $reflection->newInstanceArgs($params);
    }
}
