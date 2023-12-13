<?php

namespace App\View\Components\web\blog\post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class show extends Component
{
    /**
     * Create a new component instance.
     */

    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function changeTitle(){
        $this->post->title = 'Nuevo titulo desde el componente';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.blog.post.show');
    }
}
