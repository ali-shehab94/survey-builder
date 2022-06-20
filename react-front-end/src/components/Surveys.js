import { useState, useEffect } from 'react';
import Survey from './Survey';

const Surveys = ({ surveys }) => {
  return (
    <>
      <h1>Hi</h1>
      {surveys.map((survey) => (
        <Survey key={survey.id} survey={survey} />
      ))}
    </>
  );
};

export default Surveys;
