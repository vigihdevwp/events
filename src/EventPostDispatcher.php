<?php

declare(strict_types=1);

namespace VigihdevWP\Events;

use VigihdevWP\Events\Dtos\HookMappingDto;

class EventPostDispatcher
{
    private array $listeners = [];

    /**
     * @param HookMappingDto[] $events
     */
    public function __construct(
        private readonly array $events,
        private readonly object $listener
    ) {}

    public function register(): void
    {

        foreach ($this->events as $event) {
            $hook = $event->hook;
            $method = $event->method;
            $priority = $event->priority;
            $acceptedArgs = $event->acceptedArgs ?? 1;

            if (method_exists($this->listener, $method) && is_callable([$this->listener, $method])) {
                add_action($hook, [$this->listener, $method], $priority, $acceptedArgs);
                $this->listeners[$hook][] = [
                    'name' => $event->name,
                    'method' => $method,
                    'priority' => $priority
                ];
            }
        }
    }

    public function getRegister(): array
    {
        return $this->listeners;
    }
}
