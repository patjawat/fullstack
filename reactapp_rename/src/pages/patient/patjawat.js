import React, { useContext } from "react";
import { Button } from "reactstrap";
import { CounterContext } from './hooks';


export default function Patjawat() {
  const [count, setCount] = useContext(CounterContext);

  const increment = () => {
    setCount(count + 1);
  };

  const decrement = () => {
    setCount(count - 1);
  };

  return (
    <div>
        <Button color="primary" onClick={increment}>
          Add +
        </Button>
        {' '}
        <Button color="danger" onClick={decrement}>
          Minus -
        </Button>
    </div>
  );
}
