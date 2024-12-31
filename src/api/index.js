//import axios
import axios from 'axios';

const Api = axios.create({
    //samakan dengan url api Laravel modul 5
    baseURL: 'http://127.0.0.1:8000'
})

try {
    await axios.post('http://localhost/api/projects', formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
      },
    });
    router.push('/projects');  // Redirect ke halaman project list
  } catch (error) {
    console.error('Error creating project:', error.response || error.message);
}
  

export default Api 