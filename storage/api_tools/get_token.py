#!/bin/python

import argparse
import requests
import getpass
import json

parser = argparse.ArgumentParser(description='Retrieve EZDash api key')
parser.add_argument('-e','--email', help='Enter your EZDash email address', required=True)
parser.add_argument('-p','--password', help='Enter your EZDash password, or leave blank to be prompted', nargs='?', default='prompt', const='prompt', required=True)
parser.add_argument('-u', '--url', help='Enter the hostname of the EZDash website (ex: http://www.ezdash.com)', default='http://127.0.0.1')
args = vars(parser.parse_args())

email_address = args['email']
host_address = args['url']
if args['password'] == 'prompt':
    password = getpass.getpass("Enter your password: ")
else:
    password = args['password']

def main():
    payload = {'email': email_address, 'password': password }
    response = requests.post(f"{host_address}/api/login", data=payload)
    print(json.dumps(response.json(), indent=4))

if __name__ == "__main__":
    main()