<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureVault</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* style.css */
:root {
  --primary: #6366f1;
  --primary-hover: #4f46e5;
  --background: #0f172a;
  --glass: rgba(255, 255, 255, 0.05);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', system-ui, sans-serif;
  min-height: 100vh;
  background: var(--background);
  background-image: 
    radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
    radial-gradient(circle at 90% 80%, rgba(99, 102, 241, 0.15) 0%, transparent 50%);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1.6;
}

.container {
  background: var(--glass);
  backdrop-filter: blur(12px);
  border-radius: 20px;
  padding: 3rem;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
  border: 1px solid rgba(255, 255, 255, 0.1);
  max-width: 600px;
  margin: 2rem;
  text-align: center;
  transform: translateY(0);
  transition: transform 0.3s ease;
}

.container:hover {
  transform: translateY(-5px);
}

h1 {
  font-size: 2.5rem;
  margin-bottom: 1.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.75rem;
}

p {
  color: rgba(255, 255, 255, 0.9);
  margin-bottom: 1rem;
}

.hint {
  padding: 1rem;
  margin: 2rem 0;
  background: rgba(255, 255, 255, 0.05);
  border-left: 4px solid var(--primary);
  border-radius: 4px;
  text-align: left;
}

.hint p {
  color: rgba(255, 255, 255, 0.7);
  font-size: 0.9rem;
}

.btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 1rem 2rem;
  background: linear-gradient(45deg, var(--primary), #7c3aed);
  color: white;
  text-decoration: none;
  border-radius: 50px;
  font-weight: 600;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
  margin-top: 1rem;
}

.btn:hover {
  background: linear-gradient(45deg, var(--primary-hover), #6d28d9);
  box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
  gap: 0.75rem;
}

/* Particle animation background */
@keyframes particle {
  0% { transform: translateY(0) translateX(0); opacity: 0.5; }
  100% { transform: translateY(-100vh) translateX(100vw); opacity: 0; }
}

.particle {
  position: fixed;
  pointer-events: none;
  background: rgba(255, 255, 255, 0.3);
  width: 2px;
  height: 2px;
  border-radius: 50%;
  animation: particle 3s linear infinite;
  z-index: -1;
}

@media (max-width: 640px) {
  .container {
    padding: 2rem;
    margin: 1rem;
  }

  h1 {
    font-size: 2rem;
  }
}
    </style>
</head>
<body>
    <div class="container">
        <h1>🔒 Secure Vault</h1>
        <p>Welcome to SecureVault, where secrets are well... hidden.</p>

        <div class="hint">
            <p>Hint: Look beyond what’s visible </p>
        </div>

        <a href="admin/login.php" class="btn">🔑 Admin Login</a>
    </div>
</body>
</html>

