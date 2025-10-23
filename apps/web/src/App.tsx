import { useEffect, useState } from 'react';

export default function App() {
  const [apiHello, setApiHello] = useState<string>('loading…');

  useEffect(() => {
    fetch('/api/health')
      .then((r) => r.json())
      .then((d) => setApiHello(d.message))
      .catch(() => setApiHello('API not reachable'));
  }, []);

  return (
    <div style={{ fontFamily: 'Inter, system-ui, sans-serif', padding: 24 }}>
      <h1>Anybol (Phase 0)</h1>
      <p>Monorepo bootstrapped. Frontend (Vite+React) &amp; Backend (PHP) running.</p>
      <p>
        <strong>API health:</strong> {apiHello}
      </p>
    </div>
  );
}
