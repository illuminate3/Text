<?php

namespace Illuminate3\Text\Subscriber;

use Illuminate\Events\Dispatcher as Events;
use Illuminate3\Content\Model\Block;
use View, App;

/**
 * With this subscriber you can add text directly from the section
 * in the content view mode. There will be a link added in the section
 * view with a link 'Add text'. This link will open a modal window,
 * where you can add text directly to the section.
 * 
 */
class AddTextDirectlyFromSection
{
	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param Events $events
	 */
	public function subscribe(Events $events)
	{
        $events->listen('content.dispatch.renderSection', function(&$blocks, $section, $page, $isContentMode, $isModePublic) 
        {                        
            if(!$isContentMode || !$isModePublic) {
                return;
            }
            
            $block = Block::whereController('Illuminate3\Text\Controller\TextController@textarea')->first();
                        
            $fb = App::make('formbuilder');

            $fb->route('admin.content.config.store');
            $fb->hidden('page_id')->value($page->id);
            $fb->hidden('section_id')->value($section->id);
            $fb->hidden('block_id')->value($block->id);
            $fb->wysiwyg('text');
            $textForm = $fb->build();
                                    
            $blocks[] = View::make('text::add-text-from-section', array(), compact('textForm', 'section'));                          
        });
	}

}