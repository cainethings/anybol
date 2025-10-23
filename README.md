# Anybol Monorepo (Phase 0)

React (Vite+TS) frontend + PHP 8.2 API (PHP-FPM) + MySQL in a single monorepo.

## Structure
- `apps/web` — React + Vite + TypeScript
- `apps/api` — PHP API skeleton (public/index.php)
- `packages/ui` — (placeholder for shared components)
- `packages/types` — (placeholder for shared TS types)
- `infra` — Docker/Nginx/MySQL setup

## Quick Start (Local Dev without Docker)
```bash
pnpm i
pnpm --filter @anybol/web install
# dev: Vite on :5173 and PHP built-in on :8080
pnpm dev
```

Open [http://localhost:5173](http://localhost:5173) (frontend). API stub at [http://localhost:8080](http://localhost:8080).

## Docker (Nginx + PHP-FPM + MySQL + Adminer)

```bash
cp .env.example .env
docker compose up --build
# Web at http://localhost:5173 (served by Vite in dev) or http://localhost:8081 via Nginx after build
# API proxied at http://localhost:8081/api
# Adminer at http://localhost:8082  (user: root / pass from .env)
```

## Next Phases

* Phase 1: finalize DB schema & privacy model
* Phase 2: implement REST API routes (Slim or Lumen)
* Phase 3: wire web to API, add polling/SSE
