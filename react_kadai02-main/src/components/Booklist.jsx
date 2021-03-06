// Booklist.jsx
// ð½ è¿½å 
import { useState, useEffect } from "react";


// ð½ propsãè¿½å 
export const Booklist = ({ language, getData }) => {
// ð½ ããããè¿½å 
    const [bookData, setBookData] = useState(null);

    useEffect(() => {
    const result = getData?.(language).then((response) =>
        setBookData(response)
    );
    }, [language, getData]);

    // ð¼ ããã¾ã§è¿½å 

    // ð½ é¢æ°ãå®è¡ï¼`?` ãä½¿ç¨ãããã¨ã§ï¼`getData` ãå­å¨ããå ´åã®ã¿é¢æ°ãå®è¡å¯è½ï¼
    const result = getData?.(language);
  
    return (
        <ul>
        {bookData === null ? (
          <p>now loading...</p>
        ) : (
          bookData.data.items.map((x, index) => (
            <li key={index}>{x.volumeInfo.title} / {x.volumeInfo.authors}</li>
          ))
        )}
      </ul>
    );
  };