#!/bin/python

import argparse
import requests
import getpass
import json
import os
import sys
import json

parser = argparse.ArgumentParser(description='Retrieve your EZDash file upload records')
parser.add_argument('-a', '--api_token', help='Enter your EZDash api token', required=True)
parser.add_argument('-g', '--geojson', help='Enter the path to the geojson file you want to insert')
parser.add_argument('-t', '--title', help='Enter the title you want the geojson to have on the site', required=True)
parser.add_argument('-f', '--filename', help='Enter the filename you want the geojson to have on the site', required=True)
parser.add_argument('-u', '--url', help='Enter the hostname of the EZDash website (ex: http://www.ezdash.com)', default='http://127.0.0.1')
args = vars(parser.parse_args())

token = args['api_token']
host_address = args['url']
geojson = args['geojson']
title = args['title']
filename = args['filename']

if not os.path.isfile(geojson): # Geojson doesn't exist
    print(f"The file {geojson} doesn't exist. Please check the path and try again")
    sys.exit(1)
else:
    with open(geojson, 'r') as ojson:
        geojson_content = json.dumps(json.load(ojson))

url = f"{host_address}/api/insert-fileupload"

def main():
    headers = {
        "Authorization": f"Bearer {token}",
        "Accept": "application/json",
    }
    payload = {'title': title, 'filename': filename, 'geojson':  geojson_content}
    response = requests.post(url, headers=headers, data=payload)
    print(json.dumps(response.json(), indent=4))

if __name__ == "__main__":
    main()


