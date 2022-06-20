import Surveys from './Surveys';
import Header from './Header';
import Button from './Button';
import { useState, useEffect } from 'react';

const SurveysContainer = ({ displaySurveys }) => {
  const [surveys, setSurveys] = useState([]);
  useEffect(() => {
    async function getSurveys() {
      const getSurvey = await fetchSurveys();
      setSurveys(getSurvey);
    }
    getSurveys();
  }, []);

  const fetchSurveys = async () => {
    try {
      headers: {
        Authorization: `Bearer ${localStorage.getItem('access_token')}`;
      }
      const res = await fetch('http://127.0.0.1:8000/api/get_survey');
      const data = await res.json();
      console.log(data, 'sfgdf');
      return data.surveys;
    } catch (err) {
      console.log(err);
    }
  };
  return (
    <>
      {surveys.length > 0
        ? (2, (<Surveys surveys={surveys} />))
        : 'There are no surveys shared with you'}
    </>
  );
};

export default SurveysContainer;
