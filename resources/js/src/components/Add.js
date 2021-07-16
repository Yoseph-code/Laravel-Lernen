import React, { useState } from 'react';
import AppContainer from './AppContainer';
import { Link } from 'react-router-dom';
import { useHistory } from 'react-router-dom';
import api from '../api';
import { Button } from 'bootstrap';

const Add = () => {

    const history = useHistory();
    const [loading, setLoading] = useState(false);
    const [name, setName] = useState('');
    const [price, setPrice] = useState('');

    const onAddSubmit = async () => {
        setLoading(true);
        try {
            await api.addProducts({
                name, price,
            });
            history.push('/dashboard');
        } catch {
            alert('Failed to add products!');
        } finally {
            setLoading(false);
        }
    };

    return (
        <AppContainer title="Add items">
            <form>
                <div className="form-group">
                    <label>Name</label>
                    <input className="form-control" type="text" value={name} onChange={e => setName(e.target.value)} />
                </div>
                <div className="form-group">
                    <label>Price</label>
                    <input className="form-control" type="number" inputMode="numeric" value={price} onChange={e => setPrice(e.target.value)}/>
                </div>
                <div className="form-group">
                    <button type="submit" className="btn btn-sucess btn-warning" onClick={onAddSubmit} disabled={loading}>{loading ? 'Loading...' : 'Add'}</button>
                </div>
            </form>
            <Link to="/dashboard" className="btn btn-info">Back to Dashboard</Link>
        </AppContainer>
    );
};

export default Add;