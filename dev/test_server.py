from flask import Flask, request

app = Flask(__name__)

@app.route('/', defaults={'path': ''})
@app.route("/<path:path>", methods=['GET', 'POST'])
def index(path):

    value = str({ "METHOD": request.method, "URL": request.url, "DATA": str(request.data).replace("\\n", "").replace("b\'", "").replace("\'", "").replace("\\r", "") })
    
    print(value)

    return value