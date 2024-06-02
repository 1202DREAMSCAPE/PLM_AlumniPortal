<?php

namespace App\Filament\Alumni\Widgets;

use Filament\Widgets\Widget;

class FaqWidget extends Widget
{
    protected static string $view = 'filament.alumni.widgets.faq-widget';
    protected int | string | array $columnSpan = '1/2';

    public array $faqs = [];

    public function mount()
    {
        $this->faqs = [
            ['question' => 'The Alumni Association', 'answer' => 'The <strong>PLM Alumni Association, Inc.</strong> is a SEC-registered organization composed of graduates of the university from here and abroad.<br><br> 
            PLM connects with the Alumni Association to help maintain their members\' ties to the university and Manila. 
            <br><br>The association holds its own activities to celebrate PLM\'s foundation anniversary and alumni\'s achievements, among others.'],
            ['question' => 'The Alumni Foundation', 'answer' => 'The <strong>Pamantasan ng Lungsod ng Maynila Scholars Foundation, Inc. (PLMSFI)</strong> was organized primarily for the following twin purposes and objectives:
                <br><br>- <strong>Student Assistance</strong> (i.e., grant of scholarship to economically disadvantaged, but deserving students)
                <br><br>- <strong>Development of the spirit of entrepreneurship among students.</strong>
                
                 <br><a href="https://bit.ly/plmsfiapplicationform" target="_blank" class="inline-block mt-2 bg-primary-600 font-medium text-white px-4 py-2 rounded-md hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50"> Application Form</a>'],
            ['question' => 'How to Become a Member', 'answer' => 'To become a member of the <strong>PLM Alumni Association</strong>, you need to fill out the membership form available on the association\'s website or visit the alumni office located at the university campus.<br><br>
            <a href="https://plm.edu.ph/alumni/membership-form" target="_blank" class="inline-block mt-2 bg-primary-600 font-medium text-white px-4 py-2 rounded-md hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">Membership Form</a>'],
        ];        
    }
}
