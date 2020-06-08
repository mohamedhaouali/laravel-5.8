import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
export default class Example extends Component {
    constructor(props){
        super(props);
        this.state={
            clients:[]
        }
    }
    componentDidMount() {
        const url = 'http://localhost/laravel1/public/api/clients';
        axios.get(url).then(response => response.data)
            .then((data) => {
                this.setState({ clients: data })
                console.log(this.state.clients)
            })
    }
    render() {
        return (
            <div className="container">
                <div className="col-xs-8">
                    <h1>Liste des clients</h1>
                    {this.state.clients.map((user) => (
                        <div className="row">
                            <p className="card-title">{user.nom} {user.prenom} {user.VILLE}</p>
                        </div>
                    ))}
                </div>
            </div>
        );
    }
}
if (document.getElementById('X')) {
    ReactDOM.render(<Example />, document.getElementById('X'));
}
