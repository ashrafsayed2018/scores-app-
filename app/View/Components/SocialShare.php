<?php

namespace App\View\Components;

use Share;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class SocialShare extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public $socialShare;
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $this->socialShare = Share::page(Auth::user()->referral_link, 'rawjly website')
            ->facebook()
            ->linkedin()
            ->twitter()
            ->telegram()
            ->whatsapp()
            ->getRawLinks();
        // dd($this->socialShare);
        return view('components.social-share');
    }
}
