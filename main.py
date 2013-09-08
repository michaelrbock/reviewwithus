#!/usr/bin/env python

import webapp2
import cgi
import re
import os
import jinja2
import urllib2
from xml.dom import minidom
from string import letters
import hashlib
import hmac
import logging
import json
from datetime import datetime, time
from google.appengine.api import memcache
from google.appengine.ext import db

jinja_environment = jinja2.Environment(autoescape=True,
    loader=jinja2.FileSystemLoader(os.path.join(os.path.dirname(__file__), 'templates')))

def hash_str(s):
	return hmac.new(SECRET, s).hexdigest()

def make_secure_val(s):
	return "%s|%s" % (s, hash_str(s))

def check_secure_val(h):
	val = h.split('|')[0]
	if h == make_secure_val(val):
		return val

def render_str(template, **params):
	t = jinja_environment.get_template(template)
	return t.render(params)

class BaseHandler(webapp2.RequestHandler):
	def render(self, template, **kw):
		self.response.out.write(render_str(template, **kw))

	def write(self, *a, **kw):
		self.response.out.write(*a, **kw)

class MainHandler(BaseHandler):
    def get(self):
        self.render('index.html')

app = webapp2.WSGIApplication([
    ('/', MainHandler)
], debug=True)
