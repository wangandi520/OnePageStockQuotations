# encoding:utf-8

# pip install requests

import requests

myUrl = 'https://hq.sinajs.cn/list=sh600031'

headers={'Referer':'https://finance.sina.com.cn'}

response = requests.post(myUrl, headers = headers)
if response.status_code == 200:
    print(response.text)