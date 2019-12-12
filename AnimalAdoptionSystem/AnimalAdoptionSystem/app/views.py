"""
Definition of views.
"""

from datetime import datetime
from django.shortcuts import render
from django.http import HttpRequest
from app.models import User, Opet

def home(request):
    """Renders the home page."""
    assert isinstance(request, HttpRequest)
    return render(
        request,
        'app/index.html',
        {
            'title':'首頁',
            'year':datetime.now().year,
        }
    )

def contact(request):
    """Renders the contact page."""
    assert isinstance(request, HttpRequest)
    return render(
        request,
        'app/contact.html',
        {
            'title':'Contact',
            'message':'Your contact page.',
            'year':datetime.now().year,
        }
    )

def about(request):
    """Renders the about page."""
    assert isinstance(request, HttpRequest)
    return render(
        request,
        'app/about.html',
        {
            'title':'About',
            'message':'Your application description page.',
            'year':datetime.now().year,
        }
    )


def user_info(request):
    """Renders the user_info."""
    assert isinstance(request, HttpRequest)
    return render(request,'app/user_info.html',{'title':'個人頁面'})

def user_foster(request):
    """Renders the home page."""
    user=User.objects.filter(userID='6418a35b-daa0-4fbc-a455-6622a854a63f')
    opet=Opet.objects.filter(userID='6418a35b-daa0-4fbc-a455-6622a854a63f')
    context={
        'opet':opet,
        'user':user}
    assert isinstance(request, HttpRequest)
    return render(request,'app/user_foster.html',context=context)

def user_data(request):
    """Renders the home page."""
    user=User.objects.filter(userID='6418a35b-daa0-4fbc-a455-6622a854a63f')
    context={
        'user':user}
    assert isinstance(request, HttpRequest)
    return render(request,'app/user_list.html',context=context)