import React from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import Survey from '@/Components/Survey';
import { Head } from '@inertiajs/react';

export default function Index({ auth, surveys }) {
    return (
        <GuestLayout>
            <Head title="Surveys" />

            <div className="mt-6 bg-white shadow-sm rounded-lg divide-y">
               {surveys.map(survey =>
                  <Survey key={survey.id} survey={survey} />
               )}
            </div>
        </GuestLayout>
    );
}