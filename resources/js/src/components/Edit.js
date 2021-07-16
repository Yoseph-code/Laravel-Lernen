import React, { useState, useEffect } from 'react';
import AppContainer from './AppContainer';
import { Link } from 'react-router-dom';
import { useHistory, useParams } from 'react-router-dom';
import api from '../api';

const Edit = () => {

    const { id } = useParams();
    const history = useHistory();
    const [loading, setLoading] = useState(false);
    const [name, setName] = useState('');
    const [price, setPrice] = useState('');

    const onEditSubmit = async () => {
        setLoading(true);
        try {
            await api.updateProducts({
                name, price,
            }, id);
            history.push('/dashboard');
        } catch {
            alert('Failed to edit product!');
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        api.getOneProduct(id).then(res => {
            const result = res.data;
            const product = result.data;
            setName(product.name);
            setPrice(product.price);
        })
    }, []);

    return (
        <AppContainer title="Edit items">
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
                    <button type="submit" className="btn btn-sucess btn-warning" onClick={onEditSubmit} disabled={loading}>{loading ? 'Loading...' : 'Edit'}</button>
                </div>
            </form>
            <Link to="/dashboard" className="btn btn-info">Back to Dashboard</Link>
        </AppContainer>
    );
};

export default Edit;