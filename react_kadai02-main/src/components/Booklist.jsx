// Booklist.jsx
// 🔽 追加
import { useState, useEffect } from "react";


// 🔽 propsを追加
export const Booklist = ({ language, getData }) => {
// 🔽 ここから追加
    const [bookData, setBookData] = useState(null);

    useEffect(() => {
    const result = getData?.(language).then((response) =>
        setBookData(response)
    );
    }, [language, getData]);

    // 🔼 ここまで追加

    // 🔽 関数を実行（`?` を使用することで，`getData` が存在する場合のみ関数を実行可能）
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