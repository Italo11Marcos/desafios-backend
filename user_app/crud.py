from sqlalchemy.orm import Session

from . import models, schemas


def get_user(db: Session, name: str):
    return db.query(models.User).filter(models.User.name == name).first()

def get_users(db: Session, skip: int = 0, limit: int = 100):
    return db.query(models.User).offset(skip).limit(limit).all()

def create_user(db: Session, user: User):
    db.add(db_user)
    db.commit()
    db.refresh(db_user)
    return db_user