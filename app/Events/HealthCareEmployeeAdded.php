<?php

namespace App\Events;

use App\HealthCareEmployee;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class HealthCareEmployeeAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $healthCareEmployee;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(HealthCareEmployee $healthCareEmployee)
    {
        $this->healthCareEmployee = $healthCareEmployee;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
