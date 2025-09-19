#!/bin/python

import argparse
import requests
import getpass
import json

parser = argparse.ArgumentParser(description='Retrieve your EZDash file upload records')
parser.add_argument('-a','--api_token', help='Enter your EZDash api token', required=True)
parser.add_argument('-i', '--id', help='Enter the id of the file upload record you want to see')
parser.add_argument('-u', '--url', help='Enter the hostname of the EZDash website (ex: http://www.ezdash.com)', default='http://127.0.0.1')
args = vars(parser.parse_args())

token = args['api_token']
host_address = args['url']
file_id = args['id']
if file_id:
    url = f"{host_address}/api/fileupload/{file_id}"
else:
    url = f"{host_address}/api/fileuploads"

def main():
    headers = {
        "Authorization": f"Bearer {token}",
        "Accept": "application/json",
    }
    response = requests.get(url, headers=headers)
    print(json.dumps(response.json(), indent=4))

if __name__ == "__main__":
    main()


