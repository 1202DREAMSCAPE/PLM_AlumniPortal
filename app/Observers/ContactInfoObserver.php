<?php

namespace App\Observers;

use App\Models\ContactInfo;
use App\Models\User;

class ContactInfoObserver
{
    /**
     * Handle the ContactInfo "updated" event.
     *
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return void
     */
    public function updated(ContactInfo $contactInfo)
    {
        // Find the corresponding user
        $user = User::where('student_no', $contactInfo->user_id)->first();

        if ($user) {
            $fieldsToUpdate = [];

            // Check if the email was changed
            if ($contactInfo->isDirty('email')) {
                $fieldsToUpdate['email'] = $contactInfo->email;
            }

            // Check if the ContactNum was changed
            if ($contactInfo->isDirty('ContactNum')) {
                $fieldsToUpdate['ContactNum'] = $contactInfo->ContactNum;
            }

            // Check if the TelNum was changed
            if ($contactInfo->isDirty('TelNum')) {
                $fieldsToUpdate['TelNum'] = $contactInfo->TelNum;
            }

            // Update the User model if there are any changes
            if (!empty($fieldsToUpdate)) {
                $user->update($fieldsToUpdate);
            }
        }
    }
}
