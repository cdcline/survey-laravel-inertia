import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import { useForm, Head } from '@inertiajs/react';

export default function Index({ auth, surveys, answerTypes }) {
   const aTypes = Object.entries(answerTypes);
   let initSurveyid = surveys[0]['id'];
   let initAnswerType = aTypes[0][0];

   const { data, setData, post, processing, reset, errors } = useForm({
      survey_id: initSurveyid,
      type: initAnswerType,
      text: '',
   });

   const submit = (e) => {
      e.preventDefault();
      post(route('question.store'), { onSuccess: () => reset() });
   };

   return (
      <AuthenticatedLayout auth={auth}>
         <Head title="Questions" />

         <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
               <form onSubmit={submit}>
                  <select onChange={e => setData('survey_id', e.target.value)}>
                     {surveys.map(survey =>
                        <option key={survey.id} value={survey.id}>{survey.title}</option>
                     )}
                  </select>
                  <select onChange={e => setData('type', e.target.value)}>
                     {aTypes.map((answerType) =>
                        <option key={answerType[0]} value={answerType[0]}>{answerType[1]}</option>
                     )}
                  </select>
                  <textarea
                     value={data.text}
                     placeholder="What's on your mind?"
                     className="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                     onChange={e => setData('text', e.target.value)}
                  ></textarea>
                  <InputError message={errors.message} className="mt-2" />
                  <PrimaryButton className="mt-4" processing={processing}>Add Question</PrimaryButton>
               </form>
         </div>
      </AuthenticatedLayout>
   );
}