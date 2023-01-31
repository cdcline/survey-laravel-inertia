
import React from 'react';

export default function Question({ question }) {
   console.log(question);

    return (
      <div><h1>{question.text}</h1></div>
    );
}
