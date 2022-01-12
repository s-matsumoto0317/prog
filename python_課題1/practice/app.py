import json
from urllib.request import urlopen
from random import shuffle
import random
from flask import Flask, render_template
from bs4 import BeautifulSoup
import ssl

app = Flask(__name__)

@app.route("/")
def index():
    """初期画面を表示します."""
    return render_template("index.html")

@app.route("/api/recommend_article")
def api_recommend_article():
    ssl._create_default_https_context = ssl._create_unverified_context
    # """はてブのホットエントリーから記事を入手して、ランダムに1件返却します."""

    # """
        # **** ここを実装します（基礎課題） ****

    # 1. はてブのホットエントリーページのHTMLを取得する
    with urlopen("https://b.hatena.ne.jp/hotentry/all") as res:
        html = res.read().decode("utf-8")
    
    # 2. BeautifulSoupでHTMLを読み込む
    soup = BeautifulSoup(html, "html.parser")
    titles = soup.select("h3 a")
    links = [url.get('href') for url in soup.select('h3 a')]

    # 3. 記事一覧を取得する
    titles = [t.string for t in titles] #←これ何？

    # 4. ランダムに1件取得する
    # titleの要素数内でランダムで整数を生成。その番号の要素を取り出す
    i = random.randint(0,len(titles)-1)
    titles = titles[i]
    links = links[i]

    # 5. 以下の形式で返却する.
    return json.dumps({
        "content" : titles,
        "link" : links
    })

# @app.route("/api/xxxx")
# def api_xxxx():
#     """
#         **** ここを実装します（発展課題） ****
#         ・自分の好きなサイトをWebスクレイピングして情報をフロントに返却します
#         ・お天気APIなども良いかも
#         ・関数名は適宜変更してください
#     """
#     pass

if __name__ == "__main__":
    app.run(debug=True, port=5004)
