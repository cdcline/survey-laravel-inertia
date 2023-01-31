import React from 'react';
import Question from '@/Components/Question';
import GuestLayout from '@/Layouts/GuestLayout';

export default function Show({ auth, survey, questions }) {
   console.log(survey);
   console.log(questions);
   auth = auth ? auth : null;
    return (
        <GuestLayout>
            <div>{survey.title}</div>

            <div className="mt-6 bg-white shadow-sm rounded-lg divide-y">
               {questions.map(question =>
                  <Question key={question.id} question={question} />
               )}
            </div>
        </GuestLayout>
    );
}