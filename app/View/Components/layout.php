<?php

namespace App\View\Components;

use Illuminate\View\Component;

class layout extends Component
{
    /**
     * Page type
     *
     * @var string|null
     */
    public $type;

    /**
     * Array with JS & CSS versions for cache control
     *
     * @var mixed
     */
    public $versions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null, $versions = null)
    {
        $versions = json_decode(file_get_contents('../version.json'), true);
        $this->versions = $versions;

        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout');
    }
}
