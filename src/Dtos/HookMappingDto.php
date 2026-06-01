<?php

declare(strict_types=1);

namespace VigihdevWP\Events\Dtos;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class HookMappingDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $hook,
        public readonly string $method,
        public readonly int $priority,
        #[SerializedName('accepted_args')]
        public readonly int $acceptedArgs
    ) {}
}
